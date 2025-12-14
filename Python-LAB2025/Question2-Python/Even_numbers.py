res = []

for i in range(1000, 3001):
    if all(int(d) % 2 == 0 for d in str(i)):
        res.append(str(i))

print("Numbers with all even digits between 1000 and 3000:")
print(", ".join(res))
