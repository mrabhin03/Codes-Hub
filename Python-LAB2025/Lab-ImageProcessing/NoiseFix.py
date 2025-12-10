import cv2
import numpy as np

im = cv2.imread("ImageG1Deg.jpg", 0)

print("Original image:")
cv2.imshow("OG Image", im)

# Convert to float for noise addition
im_f = im.astype(np.float32)

gau = np.random.normal(0, 1, im.shape)

# Add noise
noise = im_f + gau

# Keep pixels valid
noise = noise.astype(np.uint8)

cv2.imshow("Noise Image", noise)

# Apply Mean Filter
fix = cv2.blur(noise, (3,3))
cv2.imshow("Mean Filtered Image", fix)

cv2.waitKey(0)
