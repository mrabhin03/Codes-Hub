num = int(input("Enter the number to check: "))

for i in range(2, (num // 2) + 1):
    if num % i == 0:
        print("The number",num,"is not a prime")
        break
else:
    print("The number",num,"is a prime")      
