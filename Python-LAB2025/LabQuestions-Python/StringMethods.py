# Get two strings
s1 = input("Enter first string: ")
s2 = input("Enter second string: ")

print("\n--- String Operations ---")

# Concatenation
print("Concatenation :", s1 + " " + s2)

# Lengths
print("Length of first string :", len(s1))
print("Length of second string :", len(s2))

# First 3 chars of s1
print("First 3 characters of first string :", s1[:3])

# Last 4 chars of s1
print("Last 4 characters of first string :", s1[-4:])

# Uppercase & lowercase (ONLY on s1)
print("First string in uppercase :", s1.upper())
print("First string in lowercase :", s1.lower())

# Reverse s1
print("First string reversed :", s1[::-1])

# Search for substring in s1
sub = input("Enter a substring to search: ")
if sub in s1:
    print(sub, "found in first string")
else:
    print(sub, "not found in first string")

# Replace
print("Replace 'a' with 'e' :", s1.replace('a', 'e'))

# Other methods on s1
print("Is first string alphabetic? :", s1.isalpha())
print("Is second string numeric? :", s2.isdigit())
