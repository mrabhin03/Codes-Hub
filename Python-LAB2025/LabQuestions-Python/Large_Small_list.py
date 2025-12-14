lst = input("Enter list elements: ").split()

nums = []
for i in lst:
    nums.append(int(i))

maximum = nums[0]
minimum = nums[0]

for n in nums:
    if n > maximum:
        maximum = n
    if n < minimum:
        minimum = n

print("Maximum element:", maximum)
print("Minimum element:", minimum)
