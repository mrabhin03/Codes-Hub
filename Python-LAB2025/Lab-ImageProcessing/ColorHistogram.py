import cv2
from matplotlib import pyplot as pt

im=cv2.imread("Image1.jpg")
print("The Orginal Image:")
cv2.imshow("Color Image",im)


print("Colored Image Histogram: ")
blue_hist=cv2.calcHist([im],[0],None,[256],[0,255])
green_hist=cv2.calcHist([im],[1],None,[256],[0,255])
red_hist=cv2.calcHist([im],[2],None,[256],[0,255])

pt.plot(blue_hist,color='blue',label='Blue Channel')
pt.plot(green_hist,color='green',label='Green Channel')
pt.plot(red_hist,color='red',label='Red Channel')

pt.legend() #(Guys, its for show label in the graph)
pt.savefig("ColorHistogram.jpg")
pt.show()
