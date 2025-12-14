

#--------------- arithmetic.py -----------------------
def add(a, b):
    return a + b

def sub(a, b):
    return a - b

def mul(a, b):
    return a * b

def div(a, b):
    return a / b




#--------------- main.py -----------------------
import arithmetic

x = int(input("Enter first number: "))
y = int(input("Enter second number: "))

print("Addition:", arithmetic.add(x, y))
print("Subtraction:", arithmetic.sub(x, y))
print("Multiplication:", arithmetic.mul(x, y))
print("Division:", arithmetic.div(x, y))
