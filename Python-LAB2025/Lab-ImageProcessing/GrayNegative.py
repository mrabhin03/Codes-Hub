import cv2
import numpy as np

im=cv2.imread("ImageG1Deg.jpg")
print("Orginal image:")
cv2.imshow("Orginal",im)

negative=255-im #<-Importent

negative=np.array(negative,dtype='uint8') #(Guys, this step is not importent)
print("Negative image:")
cv2.imshow("Negative",negative)
cv2.imwrite("GrayNegative.jpg",negative)
