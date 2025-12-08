from PIL import Image
from math import sqrt,pi,acos
def Convert(r,g,b):
    r=r/255
    g=g/255
    b=b/255
    num=0.5*((r-g)+(r-b))
    dec=sqrt((r-g)**2 + (r-b)*(g-b))
    if dec==0:
        t=0
    else:
        t=acos(num/dec)
    tar=t*180/pi
    if b<=g:
        H=tar
    else:
        H=360-tar
    H=round(H)

    if (r+g+b)==0:
        S=0
    else:
        S=3*((min(r,g,b))/(r+g+b))
    S=round(S*100)

    I=(r+g+b)/3
    I=round(I*255)
    return(H,S,I)


im=Image.open("Image1.jpg").convert("RGB")
print("Image before covertion: ")
im.show()

im_pix=im.load()
h,w=im.size
for i in range(h):
    for j in range(w):
        r,g,b=im.getpixel((i,j))
        im_pix[i,j]=Convert(r,g,b)


print("Image after coverting to HSI: ")
im.show()
im.save("Image1HSI.jpg")

