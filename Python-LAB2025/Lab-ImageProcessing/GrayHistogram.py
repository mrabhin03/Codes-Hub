import cv2
from matplotlib import pyplot as pt

im=cv2.imread("ImageG1Deg.jpg")
print("The Orginal Image:")
cv2.imshow("Orginal Image",im)

hist=cv2.calcHist([im],[0],None,[256],[0,255])
print("Histogram of the Image:")
pt.plot(hist)
pt.savefig("GrayHisto.png")
pt.show()

