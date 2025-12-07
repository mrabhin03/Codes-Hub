value=input("Enter your value to check palindrome: ")

out=""
for va in value:
    out=va+out

if value==out:
    print("The value",value,"is a palindrome")
else:
    print("The value",value,"is not a palindrome")
