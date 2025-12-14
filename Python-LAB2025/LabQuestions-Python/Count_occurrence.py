lst = input("Enter list elements: ").split()
x = input("Enter element to search: ")

count = lst.count(x)

print("Found the element", x,"'"+str(count)+ "' times")
