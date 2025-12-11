import cv2
import numpy as np

im=cv2.imread("Image10.jpg")
print("The orginal image:")

cv2.imshow("OG",im)
#im=cv2.cvtColor(im,cv2.COLOR_BGR2GRAY) #(guys, above code is not importent you can convert to gray when read)

sobelx=cv2.Sobel(im,cv2.CV_64F,0,1,ksize=3)
sobely=cv2.Sobel(im,cv2.CV_64F,1,0,ksize=3)

edge=cv2.magnitude(sobelx,sobely)

print("SobelX image:")
cv2.imshow("Sobel X",sobelx)
cv2.imwrite("SobelX.jpg",sobelx)

print("SobelY image:")
cv2.imshow("Sobel Y",sobely)
cv2.imwrite("SobelY.jpg",sobely)

print("Edges in the image:")
cv2.imshow("Edgess",edge)
cv2.imwrite("Edges.jpg",edge)

