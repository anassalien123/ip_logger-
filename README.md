# IP Logger Tool (Educational Use Only)

This tool is made for **educational and penetration testing purposes only**. It allows you to gather the public IP address of users who access a shared link.

## ⚙️ Features
- Starts a local PHP server.
- Optionally uses **Cloudflare Tunnel** to expose it to the internet.
- Logs visitor IP address, user agent, and timestamp to `ip_logs.txt`.

## 🛠️ Requirements
- Python 3.x
- PHP
- Cloudflare Tunnel (cf.exe must be in the same folder)

## 📦 Files
- `tool.py`: Starts the local server and Cloudflare tunnel.
- `ip.php`: Logs visitor IP info.
- `action.php`: Landing page that includes or redirects to `ip.php`.

## ▶️ How to Run

```bash
python tool.py
