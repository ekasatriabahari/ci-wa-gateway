const { Router } = require("express");
const {
  sendMessage,
  sendBulkMessage,
  getReceivedMessage,
} = require("../controllers/message_controller");
const MessageRouter = Router();

MessageRouter.all("/send-message", sendMessage);
MessageRouter.all("/send-bulk-message", sendBulkMessage);
MessageRouter.all("/read-message", getReceivedMessage)
module.exports = MessageRouter;
