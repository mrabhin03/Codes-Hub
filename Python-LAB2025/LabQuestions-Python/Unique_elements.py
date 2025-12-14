def unique(lst):
    return list(set(lst))

lst = input("Enter list elements: ").split()
print("List after removing duplicates:", unique(lst))
