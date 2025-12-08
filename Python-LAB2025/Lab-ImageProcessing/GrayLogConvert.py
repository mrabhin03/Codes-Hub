import cv2
import numpy as np

im=cv2.imread("ImageG1Deg.jpg",0)
print("The Orginal Image: ")
cv2.imshow("OG Image",im)
im=im.astype(np.float32)


c=50
print("Image +50 Log tranform: ")
logTrans1=c*np.log(1+im)
logTrans1=np.array(logTrans1,dtype='uint8')

cv2.imshow("Log50 Image",logTrans1)
cv2.imwrite("Log50Image.jpg",logTrans1)

#------------

c=-200
print("Image -200 Log tranform: ")
logTrans2=c*np.log(1+im)
logTrans2=np.array(logTrans2,dtype='uint8')

cv2.imshow("Log -200 Image",logTrans2)
cv2.imwrite("Log-200Image.jpg",logTrans2)
