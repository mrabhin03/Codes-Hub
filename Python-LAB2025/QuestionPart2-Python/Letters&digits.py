s = input("Enter a string: ")

letters = 0
digits = 0

for c in s:
    if c.isalpha():
        letters += 1
    elif c.isdigit():
        digits += 1

print("Number of letters:", letters)
print("Number of digits:", digits)
