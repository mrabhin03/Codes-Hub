from PIL import Image
from numpy import asarray
import pandas as pd

Im=Image.open("Image10.jpg")
print("Format of the Image:",Im.format)
print("Orginal Image:")
Im.show()
print("Image after rotate 45deg:")
rota45=Im.rotate(45)
rota45.show()
rota45.save("Image10deg45.jpg")
print("Image after rotate 90deg:")
rota90=Im.rotate(90)
rota90.show()
rota90.save("Image10deg90.jpg")

arNum=asarray(Im)
rfraArr=pd.DataFrame(arNum[:,:,0])
print("\nThe red Array number of Image:\n",rfraArr)

gfraArr=pd.DataFrame(arNum[:,:,1])
print("\nThe green Array number of Image:\n",gfraArr)

bfraArr=pd.DataFrame(arNum[:,:,2])
print("\nThe blue Array number of Image:\n",bfraArr)

