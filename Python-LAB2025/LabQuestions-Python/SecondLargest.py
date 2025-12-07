n=int(input("Enter the length of the list: "))
li=[]
for i in range(n):
    val=int(input(f"Value {i+1}: "))
    li.append(val)
first=sec=float("-inf")#for smallest value possiable
print("The list are:",li)
for i in li:
    if i>first:
        sec=first
        first=i
    elif first>i>sec:
        sec=i


print("The Second largest number is:",sec)
