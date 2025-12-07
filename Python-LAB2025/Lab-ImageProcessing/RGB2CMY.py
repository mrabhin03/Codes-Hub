from PIL import Image

def RGBtoCMY(r,g,b):
    r=r/255
    g=g/255
    b=b/255

    c=1-r
    m=1-g
    y=1-b

    c=round(c*255)
    m=round(m*255)
    y=round(y*255)
    
    return(c,m,y)


im=Image.open("Image1.jpg").convert("RGB")
print("Image Before Convertion:")
im.show()
h,w=im.size

im_pix=im.load()

for i in range(h):
    for j in range(w):
        r,g,b=im.getpixel((i,j))
        im_pix[i,j]=RGBtoCMY(r,g,b)
        
print("Image After Convert to CMY:")
im.save("CMYImage.jpg")
im.show()
