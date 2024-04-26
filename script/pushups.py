# import cv2
# import mediapipe as mp
# import numpy as np
# import math

# class poseDetector():
    
#     def __init__(self, mode=False, complexity=1, smooth_landmarks=True,
#                  enable_segmentation=False, smooth_segmentation=True,
#                  detectionCon=0.5, trackCon=0.5):
        
#         self.mode = mode 
#         self.complexity = complexity
#         self.smooth_landmarks = smooth_landmarks
#         self.enable_segmentation = enable_segmentation
#         self.smooth_segmentation = smooth_segmentation
#         self.detectionCon = detectionCon
#         self.trackCon = trackCon
        
#         self.mpDraw = mp.solutions.drawing_utils
#         self.mpPose = mp.solutions.pose
#         self.pose = self.mpPose.Pose(self.mode, self.complexity, self.smooth_landmarks,
#                                      self.enable_segmentation, self.smooth_segmentation,
#                                      self.detectionCon, self.trackCon)
        
        
#     def findPose(self, img, draw=True):
#         imgRGB = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
#         self.results = self.pose.process(imgRGB)
        
#         if self.results.pose_landmarks:
#             if draw:
#                 self.mpDraw.draw_landmarks(img, self.results.pose_landmarks,
#                                            self.mpPose.POSE_CONNECTIONS)
                
#         return img
    
#     def findPosition(self, img, draw=True):
#         self.lmList = []
#         if self.results.pose_landmarks:
#             for id, lm in enumerate(self.results.pose_landmarks.landmark):
#                 # finding height, width of the image printed
#                 h, w, c = img.shape
#                 # Determining the pixels of the landmarks
#                 cx, cy = int(lm.x * w), int(lm.y * h)
#                 self.lmList.append([id, cx, cy])
#                 if draw:
#                     cv2.circle(img, (cx, cy), 5, (255, 0, 0), cv2.FILLED)
#         return self.lmList
        
#     def findAngle(self, img, p1, p2, p3, draw=True):   
#         # Get the landmarks
#         x1, y1 = self.lmList[p1][1:]
#         x2, y2 = self.lmList[p2][1:]
#         x3, y3 = self.lmList[p3][1:]
        
#         # Calculate Angle
#         angle = math.degrees(math.atan2(y3 - y2, x3 - x2) - 
#                              math.atan2(y1 - y2, x1 - x2))
#         if angle < 0:
#             angle += 360
#             if angle > 180:
#                 angle = 360 - angle
#         elif angle > 180:
#             angle = 360 - angle
        
#         # Draw
#         if draw:
#             cv2.line(img, (x1, y1), (x2, y2), (255, 255, 255), 3)
#             cv2.line(img, (x3, y3), (x2, y2), (255, 255, 255), 3)

#             cv2.circle(img, (x1, y1), 5, (0, 0, 255), cv2.FILLED)
#             cv2.circle(img, (x1, y1), 15, (0, 0, 255), 2)
#             cv2.circle(img, (x2, y2), 5, (0, 0, 255), cv2.FILLED)
#             cv2.circle(img, (x2, y2), 15, (0, 0, 255), 2)
#             cv2.circle(img, (x3, y3), 5, (0, 0, 255), cv2.FILLED)
#             cv2.circle(img, (x3, y3), 15, (0, 0, 255), 2)

#             cv2.putText(img, str(int(angle)), (x2 - 50, y2 + 50), 
#                         cv2.FONT_HERSHEY_PLAIN, 2, (0, 0, 255), 2)
#         return angle


# def main():
#     detector = poseDetector()
#     cap = cv2.VideoCapture(0)
    
#     count = 0
#     direction = 0
#     form = 0
#     feedback = "Fix Form"
    
#     while True:
#         ret, img = cap.read()
#         if not ret:
#             break

#         img = detector.findPose(img, draw=True)
#         lmList = detector.findPosition(img, draw=True)

#         if lmList:
#             elbow = detector.findAngle(img, 11, 13, 15, draw=True)
#             shoulder = detector.findAngle(img, 13, 11, 23, draw=True)
#             hip = detector.findAngle(img, 11, 23, 25, draw=True)

#             per = np.interp(elbow, (90, 160), (0, 100))
#             bar = np.interp(elbow, (90, 160), (380, 50))

#             if elbow > 160 and shoulder > 40 and hip > 160:
#                 form = 1

#             if form == 1:
#                 if per == 0:
#                     if elbow <= 90 and hip > 160:
#                         feedback = "Up"
#                         if direction == 0:
#                             count += 0.5
#                             direction = 1
#                     else:
#                         feedback = "Fix Form"

#                 if per == 100:
#                     if elbow > 160 and shoulder > 40 and hip > 160:
#                         feedback = "Down"
#                         if direction == 1:
#                             count += 0.5
#                             direction = 0
#                     else:
#                         feedback = "Fix Form"

#             print(count)

#             if form == 1:
#                 bar_height = 50  # Adjust the height of the bar as needed
#                 cv2.rectangle(img, (50, 50), (70, 50 + bar_height), (0, 255, 0), 3)
#                 cv2.rectangle(img, (50, int(bar) + 50), (70, 50 + bar_height), (0, 255, 0), cv2.FILLED)
#                 cv2.putText(img, f'{int(per)}%', (25, 45), cv2.FONT_HERSHEY_PLAIN, 2, (255, 0, 0), 2)

#             # Pushup counter
#                 cv2.rectangle(img, (0, 380), (100, 480), (0, 255, 0), cv2.FILLED)
#                 cv2.putText(img, str(int(count)), (25, 455), cv2.FONT_HERSHEY_PLAIN, 5, (255, 0, 0), 5)


#             # Feedback
#                 cv2.rectangle(img, (500, 0), (640, 40), (255, 255, 255), cv2.FILLED)
#                 cv2.putText(img, feedback, (500, 40), cv2.FONT_HERSHEY_PLAIN, 2, (0, 255, 0), 2)

#         cv2.imshow('Pushup counter', img)

#         key = cv2.waitKey(10)
#         if key == ord('q') or key == 27:
#             break

#     cap.release()
#     cv2.destroyAllWindows()

# if __name__ == "__main__":
#     main()



import cv2
import mediapipe as mp
import numpy as np
import math

class poseDetector():
    
    def __init__(self, mode=False, complexity=1, smooth_landmarks=True,
                 enable_segmentation=False, smooth_segmentation=True,
                 detectionCon=0.5, trackCon=0.5):
        """
        Initializes the pose detector with specified parameters.
        """
        self.mode = mode 
        self.complexity = complexity
        self.smooth_landmarks = smooth_landmarks
        self.enable_segmentation = enable_segmentation
        self.smooth_segmentation = smooth_segmentation
        self.detectionCon = detectionCon
        self.trackCon = trackCon
        
        self.mpDraw = mp.solutions.drawing_utils
        self.mpPose = mp.solutions.pose
        self.pose = self.mpPose.Pose(self.mode, self.complexity, self.smooth_landmarks,
                                     self.enable_segmentation, self.smooth_segmentation,
                                     self.detectionCon, self.trackCon)
        
        
    def findPose(self, img, draw=True):
        """
        Finds and optionally draws pose landmarks on the given image.
        """
        imgRGB = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
        self.results = self.pose.process(imgRGB)
        
        if self.results.pose_landmarks:
            if draw:
                self.mpDraw.draw_landmarks(img, self.results.pose_landmarks,
                                           self.mpPose.POSE_CONNECTIONS)
                
        return img
    
    def findPosition(self, img, draw=True):
        """
        Finds and optionally draws the positions of pose landmarks on the given image.
        """
        self.lmList = []
        if self.results.pose_landmarks:
            for id, lm in enumerate(self.results.pose_landmarks.landmark):
                # Finding height, width of the image
                h, w, c = img.shape
                # Determining the pixels of the landmarks
                cx, cy = int(lm.x * w), int(lm.y * h)
                self.lmList.append([id, cx, cy])
                if draw:
                    cv2.circle(img, (cx, cy), 5, (255, 0, 0), cv2.FILLED)
        return self.lmList
        
    def findAngle(self, img, p1, p2, p3, draw=True):   
        """
        Calculates and optionally draws the angle formed by three specified landmarks.
        """
        # Get the landmarks
        x1, y1 = self.lmList[p1][1:]
        x2, y2 = self.lmList[p2][1:]
        x3, y3 = self.lmList[p3][1:]
        
        # Calculate Angle
        angle = math.degrees(math.atan2(y3 - y2, x3 - x2) - 
                             math.atan2(y1 - y2, x1 - x2))
        if angle < 0:
            angle += 360
            if angle > 180:
                angle = 360 - angle
        elif angle > 180:
            angle = 360 - angle
        
        # Draw
        if draw:
            cv2.line(img, (x1, y1), (x2, y2), (255, 255, 255), 3)
            cv2.line(img, (x3, y3), (x2, y2), (255, 255, 255), 3)

            cv2.circle(img, (x1, y1), 5, (0, 0, 255), cv2.FILLED)
            cv2.circle(img, (x1, y1), 15, (0, 0, 255), 2)
            cv2.circle(img, (x2, y2), 5, (0, 0, 255), cv2.FILLED)
            cv2.circle(img, (x2, y2), 15, (0, 0, 255), 2)
            cv2.circle(img, (x3, y3), 5, (0, 0, 255), cv2.FILLED)
            cv2.circle(img, (x3, y3), 15, (0, 0, 255), 2)

            cv2.putText(img, str(int(angle)), (x2 - 50, y2 + 50), 
                        cv2.FONT_HERSHEY_PLAIN, 2, (0, 0, 255), 2)
        return angle


def main():
    detector = poseDetector()
    cap = cv2.VideoCapture(0)
    
    count = 0
    direction = 0
    form = 0
    feedback = "Fix Form"
    
    while True:
        ret, img = cap.read()
        if not ret:
            break

        img = detector.findPose(img, draw=True)
        lmList = detector.findPosition(img, draw=True)

        if lmList:
            elbow = detector.findAngle(img, 11, 13, 15, draw=True)
            shoulder = detector.findAngle(img, 13, 11, 23, draw=True)
            hip = detector.findAngle(img, 11, 23, 25, draw=True)

            per = np.interp(elbow, (90, 160), (0, 100))
            bar = np.interp(elbow, (90, 160), (380, 50))

            if elbow > 160 and shoulder > 40 and hip > 160:
                form = 1

            if form == 1:
                if per == 0:
                    if elbow <= 90 and hip > 160:
                        feedback = "Up"
                        if direction == 0:
                            count += 0.5
                            direction = 1
                    else:
                        feedback = "Fix Form"

                if per == 100:
                    if elbow > 160 and shoulder > 40 and hip > 160:
                        feedback = "Down"
                        if direction == 1:
                            count += 0.5
                            direction = 0
                    else:
                        feedback = "Fix Form"

            print(count)

            if form == 1:
                bar_height = 50  #  height of the bar 
                cv2.rectangle(img, (50, 50), (70, 50 + bar_height), (0, 255, 0), 3)
                cv2.rectangle(img, (50, int(bar) + 50), (70, 50 + bar_height), (0, 255, 0), cv2.FILLED)
                cv2.putText(img, f'{int(per)}%', (25, 45), cv2.FONT_HERSHEY_PLAIN, 2, (255, 0, 0), 2)

            # Pushup counter
                cv2.rectangle(img, (0, 380), (100, 480), (0, 255, 0), cv2.FILLED)
                cv2.putText(img, str(int(count)), (25, 455), cv2.FONT_HERSHEY_PLAIN, 5, (255, 0, 0), 5)

            # Feedback
                cv2.rectangle(img, (500, 0), (640, 40), (255, 255, 255), cv2.FILLED)
                cv2.putText(img, feedback, (500, 40), cv2.FONT_HERSHEY_PLAIN, 2, (0, 255, 0), 2)

        cv2.imshow('Pushup counter', img)

        key = cv2.waitKey(10)
        if key == ord('q') or key == 27:
            break

    cap.release()
    cv2.destroyAllWindows()

if __name__ == "__main__":
    main()
