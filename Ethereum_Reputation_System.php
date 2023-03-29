<!DOCTYPE html>
<html>
<head>
  <title>Ethereum Reputation System</title>
  <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js"></script>
</head>
<body>
  <h1>Ethereum Reputation System</h1>
  <h2>Enter an address to vote:</h2>
  <input id="addressInput" type="text" placeholder="Enter an address">
  <h2>Choose a score:</h2>
  <select id="scoreSelect">
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
  <button onclick="vote()">Vote</button>
  <h2>Address Reputation Scores:</h2>
  <ul id="reputationList"></ul>

  <script>
    const contractAddress = "0x1234567890123456789012345678901234567890"; // replace with actual contract address
    const contractABI = [ // replace with actual contract ABI
      {
        "inputs": [],
        "name": "getReputationScore",
        "outputs": [
          {
            "internalType": "uint256",
            "name": "",
            "type": "uint256"
          }
        ],
        "stateMutability": "view",
        "type": "function"
      },
      {
        "inputs": [
          {
            "internalType": "address",
            "name": "_subject",
            "type": "address"
          },
          {
            "internalType": "uint256",
            "name": "_score",
            "type": "uint256"
          }
        ],
        "name": "vote",
        "outputs": [],
        "stateMutability": "nonpayable",
        "type": "function"
      }
    ];
    const web3 = new Web3(window.ethereum);
    const contract = new web3.eth.Contract(contractABI, contractAddress);

    async function vote() {
      const address = document.getElementById("addressInput").value;
      const score = document
