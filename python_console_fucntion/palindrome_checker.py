import sys

def isPalindrome(text):
    '''
    This function is for finding if a text is a plaindrome.
    It takes a string as input and outputs a boolean
    '''
    text=text.lower()
    stripped_text=''.join(char for char in text if char.isalnum())#disregarding spaces and special characters
    if list(stripped_text) == list(reversed(stripped_text)):
        return True;
    else:
        return False;

def runCheck(arg_list):
    '''
    This function is for checking an input for palindrome.
    It takes a list as input and outputs a string describing if the word/sentence is a plindrome or not
    '''

    if len(arg_list)==0:
        #dont bother checking if the list is empty
        print (" A palindrome is a word or sentence that is the same when observed from either end while neglecting spaces and special characters")
        return
                                
    argType="sentence" if len(arg_list)>1 else "word"#to determine if input is a word or sentence
    real_sentence=" ".join(arg_list)#convert input to string
    sentence=real_sentence


    if (isPalindrome(sentence)):
        print("The "+argType+" '"+real_sentence+"' is a palindrome.")
    else:
        print("The "+argType+" '"+real_sentence+"' is not a palindrome.")
                  

def palindrome_checker():
    '''
    Gets the command line argument from user
    '''
    runCheck(sys.argv[1:])
    
def main():
    palindrome_checker()
       


if __name__ == '__main__':
    main()
