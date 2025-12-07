

f=open("myFile.txt",'r')
lines=0
words=0
chars=0
print("The data in the file: ")
print(f.read())
f.seek(0)
for line in f.readlines():
    lines+=1
    for word in line.split(" "):
        if word.strip():
            words+=1
            for char in word:
                chars+=1

print("Numbe of lines:",lines)
print("Numbe of words:",words)
print("Numbe of chars:",chars)
f.close()
