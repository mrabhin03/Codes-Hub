s = input("Enter a string: ")

upper = 0
lower = 0

for c in s:
    if c.isupper():
        upper += 1
    elif c.islower():
        lower += 1

print("Number of uppercase letters:", upper)
print("Number of lowercase letters:", lower)
