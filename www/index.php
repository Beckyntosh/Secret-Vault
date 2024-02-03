import sys

# Simulated database of vault access keys
VAULT_KEYS = {
    "admin": "5f4dcc3b5aa765d61d8327deb882cf99",  
}

# Hard-coded credentials (This is the vulnerability)
SECRET_KEY = "unlockthevault"

def authenticate(secret_key):
    """Check if the provided secret key is correct."""
    if secret_key == SECRET_KEY:
        return True
    else:
        return False

def access_vault(username):
    """Simulate accessing the vault if authentication is successful."""
    if username in VAULT_KEYS:
        print(f"Access granted. Vault key for {username}: {VAULT_KEYS[username]}")
    else:
        print("Access denied. User not found.")

def main():
    if len(sys.argv) != 3:
        print("Usage: python vault_access.py <username> <secret_key>")
        sys.exit(1)
    
    username = sys.argv[1]
    secret_key = sys.argv[2]
    
    if authenticate(secret_key):
        access_vault(username)
    else:
        print("Authentication failed. Invalid secret key.")

if __name__ == "__main__":
    main()
