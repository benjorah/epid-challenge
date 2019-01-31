import unittest
import unittest.mock
import io
import sys
from palindrome_checker import isPalindrome,runCheck

class TestPalindrome(unittest.TestCase):

    def test_true_palindrome(self):
        self.assertEqual(isPalindrome("anna"), True, "Should be True")

    def test_true_palindrome_upper_case(self):
        self.assertEqual(isPalindrome("AnNa"), True, "Should be True")

    def test_true_palindrome_special_chars(self):
        self.assertEqual(isPalindrome("Too hot to hoot."), True, "Should be True")

    def test_true_palindrome_empty(self):
        self.assertEqual(isPalindrome(" "), True, "Should be True")


    def test_false_palindrome(self):
        self.assertEqual(isPalindrome("annabelle"), False, "Should be False")


    ###################Integration Test##################################

    @unittest.mock.patch('sys.stdout', new_callable=io.StringIO)
    def test_integration_word(self,mock_stdout):
        runCheck(["anNa"])
        self.assertEqual(mock_stdout.getvalue(),"The word 'anNa' is a palindrome.\n")


    @unittest.mock.patch('sys.stdout', new_callable=io.StringIO)
    def test_integration_sentence(self,mock_stdout):
        runCheck(["Race", "Car"])
        self.assertEqual(mock_stdout.getvalue(),"The sentence 'Race Car' is a palindrome.\n")

 

if __name__ == '__main__':
    unittest.main()
