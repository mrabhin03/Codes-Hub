def addAtEnd(lis):
    value=input("Enter the value to insert: ")
    lis.append(value)

def addAtPosition(lis):
    value=input("Enter the value to insert: ")
    index=input("Enter the index to insert: ")
    lis.insert(int(index),value)

def remove(lis):
    value=input("Enter the value to delete: ")
    if value in lis:
        lis.remove(value)
    else:
        print("Value is not in list")

def removeLast(lis):
    lis.pop()

def display(lis):
    print("List values are: ")
    for i in lis:
        print(i,end=", ")
    print()
def sort(lis):
    lis.sort()
    
def reverse(lis):
    lis.reverse()

def length(lis):
    print("The length of the lis:",len(lis))


lis=[]

while True:
    print("Press 0 to exit")
    print("Press 1 to add at end")
    print("Press 2 to add at index")
    print("Press 3 to remove element")
    print("Press 4 to pop element")
    print("Press 5 to display")
    print("Press 6 to sort")
    print("Press 7 to reverse")
    print("Press 8 to length")

    cho=int(input("\nEnter your choice: "))
    print("\n")

    if cho==0:
        display(lis)
        print("Exiting..")
        break
    elif cho==1:
        addAtEnd(lis)
    elif cho==2:
        addAtPosition(lis)
    elif cho==3:
        remove(lis)
    elif cho==4:
        removeLast(lis)
    elif cho==5:
        display(lis)
    elif cho==6:
        sort(lis)
    elif cho==7:
        reverse(lis)
    elif cho==8:
        length(lis)
    else:
        print("Wrong input")



