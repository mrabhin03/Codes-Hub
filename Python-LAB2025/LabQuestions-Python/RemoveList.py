n=int(input("Enter the length of list: "))

li=[]
for i in range(n):
    num=input(f"Enter the value{i+1}: ")
    li.append(num)

print("Elements in the list: ",(", ".join(li)))
ele=input("Enter the element to remove: ")
if ele in li:
    li.remove(ele)
    print("Elements in the list after remove: ",(", ".join(li)))
else:
    print("Element not found")
