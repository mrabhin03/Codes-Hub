from PIL import Image
from numpy import asarray
import pandas as pd

Im=Image.open("Image1.jpg").convert("L")
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
fraArr=pd.DataFrame(arNum)
print("The Array number of Image:\n",fraArr)
