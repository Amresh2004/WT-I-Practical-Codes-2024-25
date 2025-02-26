#include <stdio.h>
#include <string.h>
#include<stdlib.h>
#define MAX_FILES 10
int *disk; 
int n; 
char directory[MAX_FILES][30]; 
int file_start[MAX_FILES]; 
int file_blocks[MAX_FILES]; 
			    
void initializeDisk() 
{
	for (int i = 0; i < n; i++) 
	{
		disk[i] = 0; 
	}
	for (int i = 0; i < MAX_FILES; i++) 
	{
		directory[i][0] = '\0'; 
		file_start[i] = -1; 
		file_blocks[i] = 0;
	}
}

void displayBitVector() 
{
	printf("\nDisk Bit Vector (0 = Free, 1 = Allocated):\n");
	for (int i = 0; i < n; i++) 
	{
		printf("%d ", disk[i]);
	}
	printf("\n");
}

void createFile() 
{
	char fileName[30];
	int numBlocks;
	printf("\nEnter file name: ");
	scanf("%s", fileName);
	for (int i = 0; i < MAX_FILES; i++) 
	{
		if (strcmp(directory[i], fileName) == 0) 
		{
			printf("File already exists!\n");
			return;
		}
	}
	printf("Enter number of blocks needed for the file: ");
	scanf("%d", &numBlocks);
	int freeBlocks = 0;
	for (int i = 0; i < n; i++) 
	{
		if (disk[i] == 0) 
		{
			freeBlocks++;
		}
	}
	if (freeBlocks < numBlocks) 
	{
		printf("Not enough free blocks available!\n");
		return;
	}
	int startBlock = -1;
	int consecutiveBlocks = 0;
	for (int i = 0; i < n; i++) 
	{
		if (disk[i] == 0) 
		{
			if (consecutiveBlocks == 0) 
			{
				startBlock = i; 
			}
			consecutiveBlocks++;
			disk[i] = 1; 
		}
		if (consecutiveBlocks == numBlocks) 
		{
			break;
		}
	}
	if (consecutiveBlocks == numBlocks) 
	{
		for (int i = 0; i < MAX_FILES; i++) 
		{
			if (directory[i][0] == '\0') 
			{
				strcpy(directory[i], fileName);
				file_start[i] = startBlock;
				file_blocks[i] = numBlocks;
				printf("File '%s' created successfully at block %d.\n", fileName, startBlock);
				return;
			}
		}
	} 
	else 
	{
		printf("Not enough contiguous blocks available!\n");
	}
}

void showDirectory() 
{
	printf("\nDirectory contents:\n");
	for (int i = 0; i < MAX_FILES; i++) 
	{
		if (directory[i][0] != '\0') 
		{
			printf("File Name: %s, Start Block: %d, Blocks: %d\n", directory[i], file_start[i], file_blocks[i]);
		}
	}
}

void deleteFile() 
{
	char fileName[30];
	printf("\nEnter the file name to delete: ");
	scanf("%s", fileName);
	int found = 0;
	for (int i = 0; i < MAX_FILES; i++) 
	{
		if (strcmp(directory[i], fileName) == 0) 
		{
			found = 1;
			int startBlock = file_start[i];
			int numBlocks = file_blocks[i];
			for (int j = startBlock; j < startBlock + numBlocks; j++) 
			{
				disk[j] = 0; 
			}
			directory[i][0] = '\0';
			file_start[i] = -1;
			file_blocks[i] = 0;
			printf("File '%s' deleted successfully.\n", fileName);
			break;
		}
	}
	if (!found) 
	{
		printf("File not found!\n");
	}
}
int main() 
{
	int choice;
	printf("Enter the number of blocks in the disk: ");
	scanf("%d", &n);
	disk = (int *)malloc(n * sizeof(int));
	if (disk == NULL) 
	{
		printf("Memory allocation failed!\n");
		return -1;
	}
	initializeDisk();
	do {
		printf("\nMenu:\n");
		printf("1. Create new file\n");
		printf("2. Show directory\n");
		printf("3. Delete file\n");
		printf("4. Show disk bit vector\n");
		printf("5. Exit\n");
		printf("Enter your choice: ");
		scanf("%d", &choice);
		switch (choice) 
		{
			case 1:
				createFile();
				break;
			case 2:
				showDirectory();
				break;
			case 3:
				deleteFile();
				break;
			case 4:
				displayBitVector();
				break;
			case 5:
				printf("Exiting...\n");
				break;
			default:
				printf("Invalid choice! Please try again.\n");
		}
	} while (choice != 5);
	free(disk);
	return 0;
}
