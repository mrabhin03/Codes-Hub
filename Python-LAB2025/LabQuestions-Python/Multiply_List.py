def mul(lst):
    result = 1
    for i in lst:
        result *= i
    return result

lst = input("Enter list elements: ").split()

nums = []
for i in lst:
    nums.append(int(i))

print("Product of all elements in the list:", mul(nums))
