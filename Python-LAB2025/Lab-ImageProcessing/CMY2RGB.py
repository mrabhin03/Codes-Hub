from PIL import Image

def convertion(c,m,y):
    c/=255
    m/=255
    y/=255

    r=1-c
    g=1-m
    b=1-y

    r=round(r*255)
    g=round(g*255)
    b=round(b*255)

    return (r,g,b)


im=Image.open("CMYImage.jpg")
print("Input image CMY:")
im.show()

h,w=im.size
im_pix=im.load()

for i in range(h):
    for j in range(w):
        c,m,y=im.getpixel((i,j))
        im_pix[i,j]=convertion(c,m,y)

print("Output image RGB:")
im.show()
im.save("NewRGB.jpg")
