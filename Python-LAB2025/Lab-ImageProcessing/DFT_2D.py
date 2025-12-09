from PIL import Image
from matplotlib import pyplot as pt
import numpy as np

im=Image.open("ImageG1Deg.jpg").convert("L")
print("The Spartial image: ")
im.show()

arIm=np.array(im)
dft=np.fft.fft2(arIm)
mag=np.log(1+np.abs(np.fft.fftshift(dft)))

print("The Fourier image: ")
pt.title("DFT")
pt.imshow(mag,cmap='gray')
pt.savefig("FourierImage.png")
pt.show()


print("Image convert from Fourier: ")
pt.title("Image from Fourier")
inv_dft=np.fft.ifft2(dft)
pt.imshow(np.abs(inv_dft),cmap='gray')
pt.savefig("BackToImage.png")
pt.show()
