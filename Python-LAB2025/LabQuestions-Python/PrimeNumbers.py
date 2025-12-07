

num1=int(input("Enter the lower limit: "))
num2=int(input("Enter the upper limit: "))

primes=[]
for num in range(num1,num2+1):
    for n in range(2,(num//2)+1):
        if num%n==0:
            break
    else:
        primes.append(str(num))

print("There are",len(primes),"between",num1,"and",num2)
if len(primes)!=0:
    print("Prime numbers are: ",", ".join(primes))
        
