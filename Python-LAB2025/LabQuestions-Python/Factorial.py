def recursive(num):
    if num<=1:
        return 1
    return num*recursive(num+1)

def normal(num):
    fact=1
    for i in range(1,num+1):
        fact*=i
    return fact


    
number=int(input("Enter the number: "))

print("Factorial using for loop:",normal(number))
print("Factorial using recursive function :",recursive(number))
