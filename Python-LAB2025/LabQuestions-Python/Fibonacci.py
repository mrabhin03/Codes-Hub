def febno(num):
    feb=[0,1]
    for i in range(1,num-1):
        feb.append(feb[i]+feb[i-1])
    return feb[:num]



number=int(input("Enter the length of fibonacci series: "))

print("First",number,"fibonacci series are:")
for fe in febno(number):
    print(fe,end=", ")
