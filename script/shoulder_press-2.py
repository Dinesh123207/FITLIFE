# Import necessary libraries
from flask import Flask, render_template, Response, redirect, url_for
import cv2
import mediapipe as mp
import math
import numpy as np
import time
from datetime import datetime
import os
import json

app = Flask(__name__)

# Load the MediaPipe Pose model
mp_drawing = mp.solutions.drawing_utils
mp_pose = mp.solutions.pose

# Initialize the MediaPipe pose detection object
pose = mp_pose.Pose()

# Open the webcam
cap = cv2.VideoCapture(0)

# Check if the camera is successfully opened
if not cap.isOpened():
    print("Failed to open the camera")
    exit()

# Initialize variables
left_reps = 0
right_reps = 0
left_status = False
right_status = False
delay_timer = 0  # Delay timer for the 5-second countdown
countdown_timer = 5  # Countdown timer for starting the exercise

# Function to calculate angle between three points
def calculate_angle(a, b, c):
    angle_rad = np.arctan2(c[1]-b[1], c[0]-b[0]) - np.arctan2(a[1]-b[1], a[0]-b[0])
    angle_deg = np.abs(np.degrees(angle_rad))
    return angle_deg

# Flag to indicate if tracking and counting should start
start_tracking = False

# Initialize press_data as an empty list
press_data = []

# Initialize press_timer and total_reps
press_timer = 0
total_reps = 0

# Capture start time when exercise begins
start_time = datetime.now()

# Function to get the current timestamp
def get_current_time():
    now = datetime.now()
    return now.strftime("%Y-%m-%d %H:%M:%S")

# Define keypoints for shoulder press exercise
LEFT_SHOULDER = 11
LEFT_ELBOW = 13
LEFT_WRIST = 15
LEFT_HIP = 23
RIGHT_SHOULDER = 12
RIGHT_ELBOW = 14
RIGHT_WRIST = 16
RIGHT_HIP = 24

@app.route('/')
def index():
    return redirect(url_for('shoulder_press'))

@app.route('/shoulder_press')
def shoulder_press():
    return render_template('press.html', start_tracking=start_tracking)

def generate_frames():
    global left_reps
    global right_reps
    global left_status
    global right_status
    global delay_timer
    global start_tracking
    global countdown_timer
    global press_data

    results = None

    while cap.isOpened():
        ret, frame = cap.read()
        if not ret:
            print("Failed to capture frame")
            break

        # Convert the image to RGB
        frame_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)

        # Countdown initialization
        if countdown_timer > 0:
            countdown_text = f"Starting in {countdown_timer} seconds"
            text_size = cv2.getTextSize(countdown_text, cv2.FONT_HERSHEY_SIMPLEX, 1, 2)[0]
            text_x = (frame.shape[1] - text_size[0]) // 2
            text_y = (frame.shape[0] + text_size[1]) // 2
            cv2.putText(frame, countdown_text, (text_x, text_y), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 0, 255), 2)
            countdown_timer -= 1
        else:
            if start_tracking:
                # Process the image with MediaPipe Pose
                results = pose.process(frame_rgb)

                # Check if pose landmarks are detected
                if results.pose_landmarks:
                    landmarks = results.pose_landmarks.landmark
                    # Get the landmarks for the left shoulder, left elbow, left wrist and left hip
                    left_shoulder = landmarks[LEFT_SHOULDER]
                    left_elbow = landmarks[LEFT_ELBOW]
                    left_wrist = landmarks[LEFT_WRIST]
                    left_hip = landmarks[LEFT_HIP]

                    # Get the landmarks for the right shoulder, right elbow, right wrist and right hip
                    right_shoulder = landmarks[RIGHT_SHOULDER]
                    right_elbow = landmarks[RIGHT_ELBOW]
                    right_wrist = landmarks[RIGHT_WRIST]
                    right_hip = landmarks[RIGHT_HIP]

                    # Calculate the left arm angle(elbow)
                    left_elbow_angle = calculate_angle(
                        [left_shoulder.x, left_shoulder.y],
                        [left_elbow.x, left_elbow.y],
                        [left_wrist.x, left_wrist.y]
                    )
                    left_elbow_angle = min(left_elbow_angle, 180)  # Limit angle to 180 degrees

                    # Calculate the left arm angle(shoulder)
                    left_shoulder_angle = calculate_angle(
                        [left_elbow.x, left_elbow.y],
                        [left_shoulder.x, left_shoulder.y],
                        [right_shoulder.x, right_shoulder.y]
                    )
                    left_shoulder_angle = min(left_shoulder_angle, 180)  # Limit angle to 180 degrees

                    # Calculate the left arm angle(armpit)
                    left_armpit_angle = calculate_angle(
                        [left_elbow.x, left_elbow.y],
                        [left_shoulder.x, left_shoulder.y],
                        [left_hip.x, left_hip.y]
                    )
                    left_armpit_angle = min(left_armpit_angle, 180)  # Limit angle to 180 degrees

                    # Calculate the right arm angle(elbow)
                    right_elbow_angle = calculate_angle(
                        [right_shoulder.x, right_shoulder.y],
                        [right_elbow.x, right_elbow.y],
                        [right_wrist.x, right_wrist.y]
                    )
                    right_elbow_angle = min(right_elbow_angle, 180)  # Limit angle to 180 degrees

                    # Calculate the right arm angle(shoulder)
                    right_shoulder_angle = calculate_angle(
                        [right_elbow.x, right_elbow.y],
                        [right_shoulder.x, right_shoulder.y],
                        [left_shoulder.x, left_shoulder.y]
                    )
                    right_shoulder_angle = min(right_shoulder_angle, 180)  # Limit angle to 180 degrees

                    # Calculate the right arm angle(armpit)
                    right_armpit_angle = calculate_angle(
                        [right_elbow.x, right_elbow.y],
                        [right_shoulder.x, right_shoulder.y],
                        [right_hip.x, right_hip.y]
                    )
                    right_armpit_angle = min(right_armpit_angle, 180)  # Limit angle to 180 degrees
        
                    # Count Logic
                    reps_threshold = 90  # Adjust this threshold based on your preference

                    # Left Arm Logic
                    if left_elbow_angle > 90 and left_shoulder_angle == 180 and left_armpit_angle == 180:
                        if not left_status:
                            left_reps += 1
                            left_status = True
                    else:
                        left_status = False

                    # Right Arm Logic
                    if right_elbow_angle > reps_threshold and right_shoulder_angle > reps_threshold and right_armpit_angle > reps_threshold:
                        if not right_status:
                            right_reps += 1
                            right_status = True
                    else:
                        right_status = False

                # Draw landmarks and angles on the frame
                mp_drawing.draw_landmarks(frame, results.pose_landmarks, mp_pose.POSE_CONNECTIONS,
                                          mp_drawing.DrawingSpec(color=(0, 255, 0), thickness=2, circle_radius=2),
                                          mp_drawing.DrawingSpec(color=(0, 0, 255), thickness=2, circle_radius=2))

        # Text attributes
        font_scale = 0.5
        font_color = (0, 0, 0)
        line_spacing = 40

        # Display count
        cv2.putText(frame, f"Left Reps: {left_reps}", (10, 60), cv2.FONT_HERSHEY_SIMPLEX, font_scale, font_color, 2)
        cv2.putText(frame, f"Right Reps: {right_reps}", (10, 60 + line_spacing), cv2.FONT_HERSHEY_SIMPLEX, font_scale, font_color, 2)

        ret, buffer = cv2.imencode('.jpg', frame)
        if ret:
            frame = buffer.tobytes()

        yield (b'--frame\r\n'
               b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

@app.route('/video_feed')
def video_feed():
    return Response(generate_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

@app.route('/start_exercise', methods=['POST'])
def start_exercise():
    global left_reps
    global right_reps
    global delay_timer
    global start_tracking
    global countdown_timer
    global press_data
    global start_time

    start_tracking = True
    left_reps = 0
    right_reps = 0
    delay_timer = 0
    countdown_timer = 5
    press_timer = 0
    total_reps
    start_time = datetime.now()    # Capture the start time
    return render_template('press.html', left_reps = left_reps, right_reps = right_reps, start_tracking=start_tracking)

# Function to load exercise data from a JSON file
def load_press_data():
    if os.path.exists('press_data.json'):
        with open('press_data.json', 'r') as json_file:
            return json.load(json_file)
    else:
        return []

# Function to save exercise data to a JSON file
def save_press_data():
    with open('press_data.json', 'w') as json_file:
        json.dump(press_data, json_file, indent=4)

@app.route('/stop_exercise', methods=['POST'])
def stop_exercise():
    global start_tracking
    global press_data
    global start_time

    start_tracking = False

    # Calculate total reps and press time
    total_left_reps = left_reps
    total_right_reps = right_reps
    curls_timer = (datetime.now() - start_time).total_seconds()

    # Get the current date and time
    timestamp = get_current_time()

    # Define the curls entry as a dictionary
    press_entry = {
        'date': timestamp.split()[0],
        'time': timestamp.split()[1],
        'time_taken': press_timer,
        'total_left_reps': total_left_reps,
        'total_right_reps': total_right_reps,
    }

    # Load existing press data and append the new entry
    press_data = load_press_data()
    press_data.append(press_entry)

    # Save the updated press dta to a JSON file
    save_press_data()

    return render_template('press.html', left_reps = left_reps, right_reps = right_reps, start_tracking = start_tracking)

if __name__ == "__main__":
    app.run(debug=True)