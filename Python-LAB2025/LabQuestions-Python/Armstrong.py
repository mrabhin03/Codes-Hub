numbers=input("Enter the number to check: ")

out=0
for num in numbers:
    out+=(int(num)**len(numbers))

if out==int(numbers):
    print("The number",numbers,"is an Armstrong")
else:
    print("The number",numbers,"is not an Armstrong")
