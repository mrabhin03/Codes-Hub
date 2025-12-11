import cv2

im=cv2.imread("Image10.jpg")
print("The Orginal Image:")
cv2.imshow("OG Image",im)
EdgeCanny=cv2.Canny(im,threshold1=100,threshold2=200)

print("Edges after using Canny:")
cv2.imshow("Canny",EdgeCanny)
cv2.imwrite("EdgeCanny.jpg",EdgeCanny)
