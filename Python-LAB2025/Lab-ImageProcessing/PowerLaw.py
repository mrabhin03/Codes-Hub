import cv2
import numpy as np

im=cv2.imread("ImageG1Deg.jpg")
print("The orginal image before transformation:")
cv2.imshow("OG Image",im)


gamma=5

power1=255*(im/255)**gamma
print("The image with gamma 5 transformation:")
cv2.imshow("power 5 Image",power1)
cv2.imwrite("PowerGamma5.jpg",power1)

#----------------------------

gamma=50

power2=255*(im/255)**gamma
print("The image with gamma 50 transformation:")
cv2.imshow("power 50 Image",power2)
cv2.imwrite("PowerGamma50.jpg",power2)
