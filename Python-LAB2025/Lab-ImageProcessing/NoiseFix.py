import cv2
import numpy as np

im=cv2.imread("Image1.jpg")
print("The Orginal Image before noise:")
cv2.imshow("OG Image",im)

print("Image after adding noise: ")
noise_val=np.random.normal(0,6,im.shape)
noiseIm=im.astype(np.float32)+noise_val
noiseIm=np.clip(0,255,noiseIm).astype("uint8")
cv2.imshow("Noise Image",noiseIm)
cv2.imwrite("NoiseImage.jpg",noiseIm)

print("Noise Image after using mean filter:")
fixIm=cv2.blur(noiseIm,(5,5))
cv2.imshow("Fixed Image",fixIm)
cv2.imwrite("NoiseFixImage.jpg",fixIm)
