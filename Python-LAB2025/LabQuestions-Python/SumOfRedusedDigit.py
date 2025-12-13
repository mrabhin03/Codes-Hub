numy=number=input("Enter the numer: ")

sod=0
while sod==0 or sod>9:
    print("reduse:",number)
    sod=0
    for num in number:
        sod+=int(num)
    number=str(sod)
    
    

print("The sum of redused digits of",numy,"is:",sod)
