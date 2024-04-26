import cv2
import mediapipe as mp
import math

# Load Mediapipe pose model
mp_pose = mp.solutions.pose
pose = mp_pose.Pose()
mp_drawing = mp.solutions.drawing_utils

# Initialize variables
reps = 0
status = False

# OpenCV video capture
cap = cv2.VideoCapture(0)

while True:
    # Read frame from video capture
    ret, frame = cap.read()
    
    # Convert the BGR image to RGB
    frame_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
    
    # Process the image with Mediapipe pose model
    results = pose.process(frame_rgb)
    
    # Check if pose landmarks are detected
    if results.pose_landmarks:
        left_shoulder = results.pose_landmarks.landmark[mp_pose.PoseLandmark.LEFT_SHOULDER]
        left_hip = results.pose_landmarks.landmark[mp_pose.PoseLandmark.LEFT_HIP]
        left_knee = results.pose_landmarks.landmark[mp_pose.PoseLandmark.LEFT_KNEE]

        # Calculate the angle between the left shoulder, elbow, and wrist
        left_angle = math.degrees(math.atan2(left_knee.y - left_hip.y, left_knee.x - left_hip.x) -
                                  math.atan2(left_shoulder.y - left_hip.y, left_shoulder.x - left_hip.x))
        left_angle = abs(left_angle)

        right_shoulder = results.pose_landmarks.landmark[mp_pose.PoseLandmark.RIGHT_SHOULDER]
        right_hip = results.pose_landmarks.landmark[mp_pose.PoseLandmark.RIGHT_HIP]
        right_knee = results.pose_landmarks.landmark[mp_pose.PoseLandmark.RIGHT_KNEE]

        # Calculate the angle between the left shoulder, elbow, and wrist
        right_angle = math.degrees(math.atan2(right_knee.y - right_hip.y, right_knee.x - right_hip.x) -
                                  math.atan2(right_shoulder.y - right_hip.y, right_shoulder.x - right_hip.x))
        right_angle = abs(right_angle)
        
        # Draw landmarks and angles on the frame
        mp_drawing.draw_landmarks(frame, results.pose_landmarks, mp_pose.POSE_CONNECTIONS,
                                  mp_drawing.DrawingSpec(color=(0, 255, 0), thickness=2, circle_radius=2),
                                  mp_drawing.DrawingSpec(color=(0, 0, 255), thickness=2, circle_radius=2))

        avg_angle = (left_angle + right_angle)/2

        if avg_angle > 55 and not status:
            status = True
        elif avg_angle < 55 and status:
            reps += 1
            status = False

        font_scale = 1.5
        font_color = (0, 0, 0)
        line_spacing = 40
        cv2.putText(frame, f"Reps: {reps}", (10, 60), cv2.FONT_HERSHEY_SIMPLEX, font_scale, font_color, 2)
        cv2.putText(frame, f"Status: {status}", (10, 60 + line_spacing), cv2.FONT_HERSHEY_SIMPLEX, font_scale, font_color, 2)
        cv2.putText(frame, f"Angle: {int(avg_angle)} ", (10, 150), cv2.FONT_HERSHEY_SIMPLEX, font_scale, font_color, 2)
    
    # Display the frame
    cv2.imshow('Pose Detection', frame)
    
    # Break the loop if 'q' is pressed
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# Release the video capture and close all windows
cap.release()
cv2.destroyAllWindows()