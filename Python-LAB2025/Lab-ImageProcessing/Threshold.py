import cv2

im=cv2.imread("Image10.jpg",0)
print("The orginal image:")
cv2.imshow("OG",im)

th,img=cv2.threshold(im,120,255,cv2.THRESH_BINARY)
print("The Threshold image:")
cv2.imshow("Threshold Image",img)
cv2.imwrite("Threshold.jpg",img)
