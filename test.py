import os
import sys
print sys.argv[1]
with open("log.txt", "a") as myfile:
	myfile.write(sys.argv[1] + "\n")
	myfile.close()
os.system(sys.argv[1])

	
"""if os.fork() == 0:
	with open("test2.txt", "a") as myfile:
		myfile.write(sys.argv[1] + "\n")
		myfile.close()
	os.system(sys.argv[1])
	sys.exit()
else:"""
