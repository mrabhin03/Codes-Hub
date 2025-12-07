from PIL import Image
from numpy import asarray

Im=Image.open("Image1.jpg")
print("Format of the Image:",Im.format)
print("Orginal Image:")
Im.show()
print("Image after rotate 45deg:")
rota45=Im.rotate(45)
rota45.show()
print("Image after rotate 90deg:")
rota90=Im.rotate(90)
rota90.show()
arNum=asarray(Im)
print("The Array number of Image:",arNum)
