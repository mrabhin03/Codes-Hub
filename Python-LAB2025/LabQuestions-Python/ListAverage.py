n=int(input("Enter how many element: "))
lis=[]
for i in range(n):
    num=int(input(f"Value{(i+1)}: "))
    lis.append(num)

print("The elements in the list: ")
count=0 #guys, we can also use len(lis)
sums=0
out=""
for i in lis:
    print(i,end=", ")
    if i>=100 and i<=999:
        out+=f"{i}, "
        count+=1
        sums+=i
if count==0:
    print("\nNo 3 digit number found")
else:
    print("\nThree digit numbers are:",out)
    print("The Average them are:",(sums/count))
    

