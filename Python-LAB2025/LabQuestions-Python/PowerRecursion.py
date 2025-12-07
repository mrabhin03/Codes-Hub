def powerOf(num,i):
    if i<=0:
        return 1
    return num*(powerOf(num,i-1))

base=int(input("Enter the base number: "))
exponent=int(input("Enter the exponent number: "))
print(f"{base}^{exponent} is:",powerOf(base,exponent))
