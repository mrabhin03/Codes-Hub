numbers=int(input("Enter your number: "))
save=numbers
out=0
while numbers>0:
    num=numbers%10
    out=(out*10)+num
    numbers=numbers//10
print("The reverse of number",save,"is:",out)
