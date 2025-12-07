import PIL
from PIL import Image
from numpy import asarray
grayImage = Image.open('InputImage.png')
grayImage.show()
print(grayImage.format)
print(grayImage.size)
data = asarray(grayImage)
print("The image after converting to array of numbers is:")
print(data)
Rotated45 = grayImage.rotate(45)
print("The image rotated by 45 degrees:")
Rotated45.show()
Rotated90 = grayImage.rotate(90)
print("The image rotated by 90 degrees:")
Rotated90.show()
