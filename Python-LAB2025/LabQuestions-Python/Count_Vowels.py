s = input("Enter a string: ")

vowels = 0
for c in s.lower():
    if c in "aeiou":
        vowels += 1

print("Number of vowels in the string:", vowels)
