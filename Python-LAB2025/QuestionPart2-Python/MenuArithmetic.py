def add(a, b):
    return a + b

def sub(a, b):
    return a - b

def mul(a, b):
    return a * b

def div(a, b):
    return a / b

cho=exp=0
a=b=0
while True:
    
    if exp==0:
        a=int(input("Enter the first digit: "))
        b=int(input("Enter the second digit: "))
        
    print("\n\nPress 0 to exit")
    print("Press 1 to add")
    print("Press 2 to substract")
    print("Press 3 to multiplay")
    print("Press 4 to divid")
    cho=int(input("Enter your choice: "))

    if cho==1:
        print(a,"+",b,"=",add(a, b))
        
    elif cho==2:
        print(a,"-",b,"=",sub(a, b))
        
    elif cho==3:
        print(a,"x",b,"=",mul(a, b))
        
    elif cho==4:
        if b!=0:
            print(a,"/",b,"=",div(a, b))
        else:
            print("Can't divide by zero")
    elif cho==0:
        break
    else:
        print("Wrong option")

    exp=int(input("Enter 0 if you want to change the values: "))
